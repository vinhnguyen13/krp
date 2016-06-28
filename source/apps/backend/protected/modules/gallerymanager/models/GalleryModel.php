<?php
class GalleryModel extends Gallery
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Gallery the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
	
    public function getDropdownList($model){
    	return CHtml::activeDropDownList(new Gallery(), 'id', CHtml::listData(Gallery::model()->findAll(), 'id', 'name'));
    }
    

}