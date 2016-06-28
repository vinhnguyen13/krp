<?php
class Statistics extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function totalView($proId){
		if(!empty($proId)){
			$cri = new CDbCriteria();
			$cri->select = 'SUM(view) as view';
			$cri->addCondition('product_id = :product_id');
			$cri->params = array(':product_id'=>$proId);
			$find = UserProduct::model()->find($cri);
			$total = 0;
			if(!empty($find)){
				$total = $find->view;
			}
			return $total;
		}
	}
}
