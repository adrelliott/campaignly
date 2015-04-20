<?php 
namespace Campaignly\Contracts;


interface BaseRepositoryInterface {

	// Retrieve methods
	public function getAllRows();
	public function getRowsWhere($where = []);

	// Crud
	public function create( array $data );
	public function update( $id, array $data = NULL );
	public function destroy( $id );
	public function duplicate( $id );

}