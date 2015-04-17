<?php namespace campaignly\Http\Requests\App;

use campaignly\Http\Requests\Request;

class StoreContactRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true; // Acessible by any logged in user
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'first_name' => 'required'
		];
	}

}
