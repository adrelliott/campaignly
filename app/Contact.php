<?php namespace Campaignly;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	protected $fillable = [ 'organisation_id', 'department_id', 'first_name', 'last_name', 'mobile_number', 'landline_number', 'title', 'first_name', 'last_name', 'nickname', 'mobile', 'landline', 'phone_3', 'phone_4', 'email', 'email_2', 'org_name', 'address_1', 'address_2', 'address_3', 'city', 'postcode', 'county', 'country', 'gender', 'dob', 'years_since'];




}
