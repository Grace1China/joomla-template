<?php
/**
 * @Component - Preachit
 * @author Paul Kosciecha http://www.truthengaged.org.uk
 * @copyright Copyright (C) Paul Kosciecha
 * @license GNU/GPL
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.modellist');
class PreachitModelTeacherlist extends JModelList
{
var $_data = null;
var $_pagination = null;
var $_total = null;
var $_search = null;
var $_query = null;

function __construct()
  {
        parent::__construct();
 	$abspath    = JPATH_SITE;
  	require_once($abspath.DIRECTORY_SEPARATOR.'components/com_preachit/helpers/additional.php');
  	$params = PIHelperadditional::getPIparams();
   // Get pagination request variables
   		$this->setState('limit', JRequest::getInt('limit', $params->get('teacherlist_no')));
        $this->setState('limitstart', JRequest::getVar('limitstart', 0, '', 'int'));
	}

	function _buildQuery()
	{
		$abspath    = JPATH_SITE;
  		require_once($abspath.DIRECTORY_SEPARATOR.'components/com_preachit/helpers/additional.php');
  		$params = PIHelperadditional::getPIparams();
  		$where = $this->_buildContentWhere();
 		$sort = $params->get('teachersort', '1');
 		if ($sort == '1') {$order = 'teacher_name DESC';}
 		if ($sort == '2') {$order = 'teacher_name ASC';}
 		if ($sort == '3') {$order = 'ordering';}
 		if ($sort == '4') {$order = 'ordering DESC';}
 		$orderby = ' ORDER BY '.$order;
		$query = "SELECT * FROM #__piteachers"
		. $where
		. $orderby;
		return $query;
	}

function getData() 
  {
        // if data hasn't already been obtained, load it
        if (empty($this->_data)) 
{
            $query = $this->_buildQuery();
            $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit')); 
        }
        return $this->_data;
  }

function getTotal()
  {
        // Load the content if it doesn't already exist
        if (empty($this->_total)) {
            $query = $this->_buildQuery();
            $this->_total = $this->_getListCount($query);    
        }
        return $this->_total;
  }

  function getPagination()
  {
        // Load the content if it doesn't already exist
        if (empty($this->_pagination)) {
            jimport('joomla.html.pagination');
            $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
        }
        return $this->_pagination;
  }
  
  function getFData()
  {
      if (empty($this->_fData))
      {
          $query = "SELECT * FROM #__piteachers WHERE featured = 1 AND published = 1";
          $this->_fData = $this->_getList($query, 0, 1); 
      }
      return $this->_fData;
  }
  
  function getFMessage($teacher = null)
  {
      if (empty($this->_fMessage))
      {
          if ($teacher == null)
          {
              $data = $this->getFData();
              if (empty($data) || count($data) >! 0)
              {$this->_fMessage = null; return $this->_fMessage;}
              $teacher = $data[0]->id;
          }
          $user    = JFactory::getUser();
          $language = JFactory::getLanguage()->getTag();
          $now = gmdate ( 'Y-m-d H:i:s' );
          $nullDate = $this->_db->getNullDate();
          $groups = implode(',', $user->getAuthorisedViewLevels());
          $wehre = array();
          $where[] = ' (#__pistudies.access IN ('.$groups.') OR #__pistudies.access = 0)';
          $where[] = ' (#__pistudies.saccess IN ('.$groups.') OR #__pistudies.saccess = 0)';
          $where[] = ' #__pistudies.teacher REGEXP \'(.*:"'.$teacher.'".*)\'';
          $where[] = ' #__pistudies.published = 1';
          // min access
            $minaccess = array();
            foreach ($user->getAuthorisedViewLevels() AS $level)
            {
                $minaccess[] = '#__pistudies.minaccess REGEXP "[[:<:]]'.$level.'[[:>:]]"';
            }
            $where[] = ' (('. ( count( $minaccess ) ? implode( ' OR ', $minaccess ) : '' ) .') OR #__pistudies.minaccess = 0)';
            $where[] = ' #__pistudies.language IN ('.$this->_db->quote($language).','.$this->_db->quote('*').')';
            $where[] = '(#__pistudies.publish_up = '.$this->_db->Quote($nullDate).' OR #__pistudies.publish_up <= '.$this->_db->Quote($now).')';
            $where[] = '(#__pistudies.publish_down = '.$this->_db->Quote($nullDate).' OR #__pistudies.publish_down >= '.$this->_db->Quote($now).')';
            $where = ( count( $where ) ? ' WHERE '. implode( ' AND ', $where ) : '' );
          $query = "SELECT * FROM #__pistudies ".$where." ORDER BY #__pistudies.study_date DESC";
          $this->_fMessage = $this->_getList($query, 0, 1); 
      }
      return $this->_fMessage;
  }
  
	function _buildContentWhere()
	{
			$app = JFactory::getApplication();			
			$user	= JFactory::getUser();
			$abspath    = JPATH_SITE;
  			require_once($abspath.DIRECTORY_SEPARATOR.'components/com_preachit/helpers/additional.php');			
			$language = JFactory::getLanguage()->getTag();
			$menuparams = $app->getParams();
			$teachersel = $menuparams->get('teachersel', 0);
			$teacherselection = $menuparams->get('teacherselect');
            $letter = JRequest::getVar('alpha', '');
			$tlist = array();	
		
			$where = array();
			$where[] = ' #__piteachers.published = 1'; 
			$where[] = ' #__piteachers.teacher_view = 1'; 
            
            if ($letter)
            {
               $where[] = ' SUBSTRING(#__piteachers.teacher_name, 1, 1) = '.$this->_db->quote($letter); 
            }
			
			if ($teachersel == 1 || $teachersel == 2) {
			if (count($teacherselection) > 1)
			{
                if ($teachersel == 1)
                {$sign = '=';}
                else {$sign = '!=';}
			    foreach ($teacherselection AS $tl)
				{
					$tlist[] = '#__piteachers.id '.$sign.' '.$tl;
				}
			if ($teachersel == 1)
            {$where[] = '('. ( count( $tlist ) ? implode( ' OR ', $tlist ) : '' ) .')';}
            else {$where[] = '('. ( count( $tlist ) ? implode( ' AND ', $tlist ) : '' ) .')';}
			}
			elseif ($teachersel == 1)
			{
				$where[] = '#__piteachers.id = '.PIHelperadditional::getwherevalue($teacherselection);
			}
		}
			$where[] = ' #__piteachers.language IN ('.$this->_db->quote($language).','.$this->_db->quote('*').')';
			
			$where 		= ( count( $where ) ? ' WHERE '. implode( ' AND ', $where ) : '' );
			
		return $where;
		
		} 
  
}