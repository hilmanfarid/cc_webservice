<?php
/**
 * p_finance_period
 * class controller for table bds_p_finance_period 
 *
 * @since 23-10-2012 12:07:20
 * @author hilman farid
 */
class abstract_controller extends wbController{    
    /**
     * read
     * controler for get all items
     */
    public static function read($args = array()){
        // Security check
        //if (!wbSecurity::check('p_finance_period')) return;
        
        // Get arguments from argument array
        extract($args);
    
        $start = wbRequest::getVarClean('start', 'int', 0);
        $limit = wbRequest::getVarClean('limit', 'int', 10);
        $sort = wbRequest::getVarClean('sort', 'str', 'p_bank_id');
        $dir = wbRequest::getVarClean('dir', 'str', 'DESC');
        $query = wbRequest::getVarClean('query', 'str', '');
		$query = rawurldecode($query); 
        $data = array('items' => array(), 'total' => 0, 'success' => false, 'message' => '');
        try{
            $table =& wbModule::getModel('bds', 'abstract_model');
			
            //$query = $table->getDisplayFieldCriteria($query);
            //if (!empty($query)) $table->setCriteria($query);

            $user_name = wbSession::getVar('user_name');
			$query = str_replace("\n", "", $query);
			$query = str_replace("\r", "", $query);
			
			$query = preg_replace('/\s+/S', " ", $query);
			$table->selectClause = "";
			$table->fromClause = $query;
			if (!preg_match('/SELECT /i',$query)){
				
				$items = $table->dbconn->GetItem($query);
				$total =1;
			}else{
			
				$items = $table->getAllNoOrder($start, $limit, $sort, $dir);
				$total = $table->countAll();
			}
            $data['items'] = $items;
            $data['total'] = $total;
            $data['success'] = true;
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }
        return $data;    
    }
}
?>