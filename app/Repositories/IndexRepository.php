<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\LogisticsDynamic;
use App\Models\WechatUser;
use App\Models\Store;
use App\Models\WechatDiscover;
use Mockery\CountValidator\Exception;
use Flash;

class IndexRepository {

    /**
     * get Latest brands count
     * @DateTime 2018-6-11
     * @return   array
     */
	public function getLatestBrand(){
		$LatestBrand = new Brand();
        try{
		$LatestBrandCount = $LatestBrand->where('created_at','=',date('Y-m-d'))->count();
        }catch (Exception $e){
            return 'not find LatestBrand';
        }
		return $LatestBrandCount;
	}    
	/**
     * get Latest products count
     * @DateTime 2018-6-11
     * @return   array
     */
	public function getLatestProduct(){
		$LatestProduct = new Product();
        try{
		$LatestProductCount = $LatestProduct->where('created_at','=',date('Y-m-d'))->count();
        }catch (Exception $e){
            return 'not find LatestProduct';
        }
		return $LatestProductCount;
	}    
	/**
     * get Latest dynamics count
     * @DateTime 2018-6-11
     * @return   array
     */
	public function getLatestDynamic(){
		$LatestDynamic = new LogisticsDynamic();
        try{
		$LatestDynamicCount = $LatestDynamic->where('status','=',1)->whereDate('created_at','=',date('Y-m-d'))->count();
        }catch (Exception $e){
            return 'not find LatestDynamic';
        }
		return $LatestDynamicCount;
	}
	
    /**
     * get Total brands count
     * @DateTime 2018-6-11
     * @return   array
     */
	public function getTotalBrand(){
		$TotalBrand = new Brand();
        try{
		$TotalBrandCount = $TotalBrand->count();
        }catch (Exception $e){
            return 'not find TotalBrand';
        }
		return $TotalBrandCount;
	}    
	/**
     * get Total products count
     * @DateTime 2018-6-11
     * @return   array
     */
	public function getTotalProduct(){
		$TotalProduct = new Product();
        try{
		$TotalProductCount = $TotalProduct->count();
        }catch (Exception $e){
            return 'not find TotalProduct';
        }
		return $TotalProductCount;
	}    
	/**
     * get Total dynamics count
     * @DateTime 2018-6-11
     * @return   array
     */
	public function getTotalDynamic(){
		$TotalDynamic = new LogisticsDynamic();
        try{
		$TotalDynamicCount = $TotalDynamic->count();
        }catch (Exception $e){
            return 'not find TotalDynamic';
        }
		return $TotalDynamicCount;
	}
	/**
     * get Total brands count
     * @DateTime 2018-6-11
     * @return   array
     */
	public function getTotalWechatUser(){
		$TotalWechatUser = new WechatUser();
        try{
		$TotalWechatUserCount = $TotalWechatUser->count();
        }catch (Exception $e){
            return 'not find TotalWechatUser';
        }
		return $TotalWechatUserCount;
	}    
	/**
     * get Total products count
     * @DateTime 2018-6-11
     * @return   array
     */
	public function getTotalStore(){
		$TotalStore = new Store();
        try{
		$TotalStoreCount = $TotalStore->count();
        }catch (Exception $e){
            return 'not find TotalStore';
        }
		return $TotalStoreCount;
	}    
	/**
     * get Total dynamics count
     * @DateTime 2018-6-11
     * @return   array
     */
	public function getTotalDiscover(){
		$TotalDiscover = new WechatDiscover();
        try{
		$TotalDiscoverCount = $TotalDiscover->where('category','=',2)->count();
        }catch (Exception $e){
            return 'not find TotalDiscover';
        }
		return $TotalDiscoverCount;
	}


}


