<?php  namespace campaignly\Crm\Repositories;

use Auth;
use campaignly\Contracts\BaseRepositoryInterface;
use Illuminate\Support\Facades\Event;

class BaseRepository implements BaseRepositoryInterface {


	/** The model
	 * @varW
	 */
	protected $model;

	/**
	 * Ensures a model has been set in the subclass (the repo)
	 */
	function __construct( ) {
		if ( ! $this->model )
			die('you need to set $this->model in the subClass (repo)');
	}


	/**
	 * Gets all rows
	 */
	public function getAllRows() {
		// TODO: Implement getAllRows() method.
	}

	/**
	 * @param array $where
	 */
	public function getRowsWhere( $where = [ ] ) {
		// TODO: Implement getRowsWhere() method.
	}


	/**
	 * @param array $data
	 */
	public function create( array $data ) {
		// records are owned by logged in user
		$this->model->user_id = Auth::user()->id;

		// Build the model object & save
		$this->model->fill($data);
		$this->model->tenant_id = Auth::user()->tenant_id;
		$this->model->save();
		// @todo: fire event

		return $this->model;
	}

	/**
	 * When updating, we want to ensure that the user_id is set
	 *
	 * @param $id
	 * @param array $data
	 */
	public function update( $id, array $data = null ) {
		$this->model->findOrFail($id);

		// Build the model object & save
		$this->model->fill($data);
		$this->model->tenant_id = Auth::user()->tenant_id;
		$this->model->save();
		// @todo: fire event

		return $this->model;
	}

	/**
	 * @param $id
	 */
	public function destroy( $id ) {
		// TODO: Implement destroy() method.
	}

	/**
	 * @param $id
	 */
	public function duplicate( $id ) {
		// TODO: Implement duplicate() method.
	}

}