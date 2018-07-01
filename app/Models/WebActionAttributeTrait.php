<?php
namespace App\Models;
use Auth;
trait WebActionAttributeTrait{

	protected $html_build;


	/**
	 * 修改按钮
	 * @return $this
	 */
	public function getEditActionButton()
	{
		if($this->action == '37fb591be38db52dd1d5f04b689008f9' || $this->action == '37fb591be38db52dd1d5f04b689008f5' || $this->action == '37fb591be38db52dd1d5f04b689008f2'){
			$this->html_build .= '<a href="'.url($this->action.'/'.$this->id.'/edit').'" class="btn btn-xs btn-primary tooltips" data-original-title="' . trans('crud.edit') . '"  data-placement="top"><i class="fa fa-pencil"></i></a>';
			return $this;
		}
		return $this;
	}
	
	/**
	 * 处理 status 为 1/2
	 * @return $this
	 */
	public function getAuditActionButton()
	{
		if($this->action == 'admin/logistics/dynamic' || $this->action == 'admin/supply/list'){
			$this->html_build .= '<a href="'.url($this->action.'/'.$this->id.'/mark/'.config('admin.global.status.ban')).'" class="btn btn-xs btn-primary tooltips" data-container="body" data-original-title="处理"  data-placement="top"><i class="fa fa-check"></i></a>';
			return $this;
		}
		return $this;
	}

	/**
	 * 彻底删除
	 * @return $this
	 */
	public function getDeleteActionButton()
	{
		if($this->action == '37fb591be38db52dd1d5f04b689008f5' || $this->action == '37fb591be38db52dd1d5f04b689008f2' || $this->action == 'admin/image/select' || $this->action == 'admin/logistics/dynamic'){
			$this->html_build .= '<a href="'.url($this->action.'/'.$this->id.'/delete/'.config('admin.global.status.active')).'" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.delete') . '"  data-placement="top"><i class="fa fa-trash"></i></a>';	
			return $this;
		}
		return $this;
	}

	/**
	 * 组合按钮
	 * @param bool $showType
	 * @return $this
	 */

	public function getActionButtonAttribute($showType = true)
	{
		
		$this->getEditActionButton()->getAuditActionButton()->getDeleteActionButton();
		return $this->html_build;
	}
}