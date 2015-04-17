<?php namespace campaignly\Traits;

use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as HTTPResponse;


trait ApiResponses {

	/**
	 * The HTTP response code (using the Symfony\Component\HttpFoundation\Response class)
	 * @var int
	 */
	protected $statusCode = HTTPResponse::HTTP_INTERNAL_SERVER_ERROR;

	/**
	 * The response data (or sometimes the data that was in the request if it errors)
	 * * Set in the class that calls this class
	 * @var array
	 */
	public $data = [];

	/**
	 * The errors, if there are any
	 * * Set in the class that calls this class
	 * @var array
	 */
	public $errors = [];

	/**
	 * The array that's used as the JSON response
	 * @var array
	 */
	protected $response = [
		'success' => FALSE,
		'message' => 'Error!',
		'data' => [],
		'errors' => [],
		'statusCode' => HTTPResponse::HTTP_INTERNAL_SERVER_ERROR
	];

	/**
	 * Returns a response in an APIy kinda way
	 * @param array $headers
	 * @internal param array $data
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respond($headers = [])
	{
		return Response::json($this->response, $this->statusCode, $headers);
	}


	/**
	 * Respond when created - 201
	 *
	 * @param bool $message
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondCreated( $message = FALSE )
	{
		// Set response
		$this->statusCode = HTTPResponse::HTTP_CREATED;
		$this->setresponse([
			'success' => TRUE,
			'message' => $message ? $message : 'Resource Created',
		]);
		return $this->respond();
	}

	/**
	 * Respond when updated - 202
	 *
	 * @param bool $message
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondUpdated( $message = FALSE)
	{
		// Set response
		$this->statusCode = HTTPResponse::HTTP_ACCEPTED;
		$this->setresponse([
			'success' => TRUE,
			'message' => $message ? $message : 'Resource Updated'
		]);
		return $this->respond();
	}

	/**
	 * Respond with result - 200
	 *
	 * @param bool $message
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondOk( $message = FALSE )
	{
		// Set response
		$this->statusCode = HTTPResponse::HTTP_OK;
		$this->setresponse([
			'success' => TRUE,
			'message' => $message ? $message : 'Here are your results:',
		]);
		return $this->respond();
	}


	/**
	 * respond not found - 404
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondResourceNotFound( $message = FALSE )
	{
		// Set response
		$this->statusCode = HTTPResponse::HTTP_NOT_FOUND;
		$this->setresponse([
			'success' => FALSE,
			'message' => $message ? $message : 'Resource not found'
		]);
		return $this->respond();
	}

	/**
	 * @param bool $message
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondInvalidRequest( $message = false )
	{
		// Set response
		$this->statusCode = HTTPResponse::HTTP_BAD_REQUEST;
		$this->setresponse([
			'success' => FALSE,
			'message' => $message ? $message : 'The request was not formatted correctly'
		]);
		return $this->respond();
	}


	/**
	 * Respond bad request - 400
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondValidationFailed( $message = false )
	{
		// Set response
		$this->statusCode = HTTPResponse::HTTP_BAD_REQUEST;
		$this->setresponse([
			'success' => FALSE,
			'message' => $message ? $message : 'Resource Validation failed',
		]);
		return $this->respond();
	}

	/**
	 * Respond Forbidden - 400
	 *
	 * @param bool $message
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondForbidden( $message = FALSE)
	{
		// Set response
		$this->statusCode = HTTPResponse::HTTP_FORBIDDEN;
		$this->setresponse([
			'success' => FALSE,
			'message' => $message ? $message : 'Authorisation Failed',
		]);
		return $this->respond();
	}


	/**
	 * Respond the world is ending - 500
	 *
	 * @param bool $message
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondInternalError( $message = false )
	{
		// Set response
		$this->statusCode = HTTPResponse::HTTP_INTERNAL_SERVER_ERROR;
		$this->setresponse([
			'success' => FALSE,
			'message' => $message ? $message : 'There was an internal error',
		]);
		return $this->respond();
	}


	/**
	 * Loops through passed array and updates response property accordingly
	 * @param array $data
	 */
	protected function setresponse($data = [])
	{
		$this->response['statusCode'] = $this->statusCode;
		$this->response['data'] = $this->data;
		$this->response['errors'] = $this->errors;

		// The above can be overridden in the array passed
		foreach ($data as $key => $value) {
			$this->response[$key] = $value;
		}
	}

}