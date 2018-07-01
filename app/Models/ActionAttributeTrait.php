<?php
namespace App\Models;
use Auth;
trait ActionAttributeTrait{

	protected $html_build;

	/**
	 * 查看按钮
	 * @param bool $type
	 * @return $this
	 */
	public function getShowActionButton($type = true)
	{
		//开启查看按钮
		if (config('admin.global.'.$this->action.'.show')) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.show'))) {
				if ($type) {
					$this->html_build .= '<a href="'.url('admin/'.$this->action.'/'.$this->id).'" class="btn btn-xs btn-info tooltips" data-container="body" data-original-title="' . trans('labels.view') . '"  data-placement="top"><i class="fa fa-search"></i></a>';
					return $this;
				}
				$this->html_build .= '<a href="'.url('admin/'.$this->action.'/'.$this->id).'" class="btn btn-xs btn-info tooltips" data-toggle="modal" data-target="#draggable" data-container="body" data-original-title="' . trans('labels.'.$this->action.'.show') . '"  data-placement="top"><i class="fa fa-search"></i></a>';
			}

		}
		return $this;
	}

	/**
	 * 修改按钮
	 * @return $this
	 */
	public function getEditActionButton()
	{
		if (Auth::user()->can(config('admin.permissions.'.$this->action.'.edit'))) {
			$this->html_build .= '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/edit').'" class="btn btn-xs btn-primary tooltips" data-original-title="' . trans('crud.edit') . '"  data-placement="top"><i class="fa fa-pencil"></i></a>';
		}
		return $this;
	}

	/**
	 * 添加回收站/禁用按钮
	 * @return $this
	 */
	public function getTrashActionButton()
	{
		if (($this->status == config('admin.global.status.active')) || ($this->status == config('admin.global.status.audit')) ) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.trash'))) {
				$this->html_build .= '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/mark/'.config('admin.global.status.audit')).'" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.trash') . '"  data-placement="top"><i class="fa fa-pause"></i></a>';
			}
		}
		return $this;
	}

	/**
	 * 从回收站恢复到待审核状态
	 * @return $this
	 */
	public function getUndoActionButton()
	{
		if (($this->status == config('admin.global.status.destroy')) || ($this->status == config('admin.global.status.trash'))) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.undo'))) {
				$this->html_build .= '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/mark/'.config('admin.global.status.audit')).'" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.undo') . '"  data-placement="top"><i class="fa fa-reply"></i></a>';
			}
		}
		return $this;
	}

	/**
	 * 通过审核按钮
	 * @return $this
	 */
	public function getAuditActionButton()
	{
		if (($this->status == config('admin.global.status.audit'))) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.audit'))) {
				$this->html_build .= '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/mark/'.config('admin.global.status.active')).'" class="btn btn-xs btn-primary tooltips" data-container="body" data-original-title="' . trans('crud.audit') . '"  data-placement="top"><i class="fa fa-check"></i></a>';
			}
		}
		return $this;
	}

	/**
	 * 软删除按钮
	 * @return $this
	 */
	public function getDestroyActionButton()
	{
		if (($this->status == config('admin.global.status.active'))) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.destroy'))) {
				$this->html_build .= '<a href="javascript:;" onclick="return false" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.destory') . '"  data-placement="top" id="destory"><i class="fa fa-trash"></i><form action="'.url('admin/'.$this->action.'/'.$this->id).'" method="POST" name="delete_item" style="display:none"><input type="hidden" name="_method" value="delete"><input type="hidden" name="_token" value="'.csrf_token().'"></form></a>';
			}
		}
		return $this;
	}
	
	/**
	 * 彻底删除
	 * @return $this
	 */
	public function getDeleteActionButton()
	{
		if (($this->status == config('admin.global.status.active')) || ($this->status == config('admin.global.status.audit')) ) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.delete'))) {
				$this->html_build .= '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/delete/'.config('admin.global.status.active')).'" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.delete') . '"  data-placement="top"><i class="fa fa-trash"></i></a>';
			}
		}
		return $this;
	}

	/**
	 * 修改用户密码
	 * @return $this
	 */
	public function getResetActionButton()
	{
		if (Auth::user()->can(config('admin.permissions.'.$this->action.'.reset'))) {
			$this->html_build .= '<a href="'.url('admin/user/'.$this->id.'/reset').'" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.reset') . '"  data-placement="top"><i class="fa fa-lock"></i></a>';
		}
		return $this;
	}
	
	
	/**
	 * 品牌添加产品按钮
	 * @return $this
	 */
	public function getCreateActionButton()
	{
		if (Auth::user()->can(config('admin.permissions.'.$this->action.'.ProductCreate'))) {
			$this->html_build .= '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/create').'" class="btn btn-xs btn-primary tooltips" data-original-title="' . trans('crud.create') . '"  data-placement="top"><i class="fa fa-user-plus"></i></a>';
		}
		return $this;
	}
	
	
	/**
	 * 品牌添加直营店
	 * @return $this
	 */
	public function getCreateStoreActionButton()
	{
		if (Auth::user()->can(config('admin.permissions.'.$this->action.'.CreateStore'))) {
			$this->html_build .= '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/store').'" class="btn btn-xs btn-primary tooltips" data-original-title="' . trans('crud.create') . '"  data-placement="top"><i class="fa fa-user-plus"></i></a>';
		}
		return $this;
	}
	
	/**
	 * 处理 article recommended 为2
	 * @return $this
	 */
	public function getArticleRecommendedActionButton()
	{
		if($this->action == 'article'){
			$this->html_build .= '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/mark/'.config('admin.global.status.ban')).'" class="btn btn-xs btn-primary tooltips" data-container="body" data-original-title="推荐"  data-placement="top"><i class="fa fa-check"></i></a>';
			return $this;
		}
		return $this;
	}
	
	/**
	 * 推荐按钮
	 * @return $this
	 */
	public function getRecomdActionButton()
	{
		if (($this->status == config('admin.global.status.active')) || ($this->status == config('admin.global.status.audit')) ) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.recomd'))) {
				$this->html_build .= '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/recomd/'.config('admin.global.status.active')).'" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.recomd') . '"  data-placement="top"><i class="fa fa-check"></i></a>';
			}
		}
		return $this;
	}
	
	/**
	 * 取消推荐
	 * @return $this
	 */

	public function getCancelRecomdActionButton()
	{
		if (($this->status == config('admin.global.status.active')) || ($this->status == config('admin.global.status.audit')) ) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.cancelrecomd'))) {
				$this->html_build .= '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/recomd/'.config('admin.global.status.audit')).'" class="btn btn-xs btn-primary tooltips" data-container="body" data-original-title="' . trans('crud.cancel') . '"  data-placement="top"><i class="fa fa-pause"></i></a>';
			}
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
		
		$this->getShowActionButton($showType)
					->getResetActionButton()
					->getEditActionButton()
					->getCreateActionButton()
					->getCreateStoreActionButton()
					->getRecomdActionButton()
					->getCancelRecomdActionButton()
					->getUndoActionButton()
					->getAuditActionButton()
					->getTrashActionButton()
					->getArticleRecommendedActionButton()
					->getDestroyActionButton()
					->getDeleteActionButton();
		return $this->html_build;
	}
}