<?php 
namespace ProgrammingBlog\Repositories\Contracts;

use ProgrammingBlog\Models\BaseModel;

/**
* Base Repository class
*/
interface RepositoryInterface
{
	/**
	 * Get storage model
     *
     * @param  integer $id
     * @return BaseModel
	 */
	public function get($id) : ?BaseModel;

	/**
     * Get Storage model within passed conditions
     *
     * @param  array $conditions A key value pair of conditions. e.g: ['name' => 'Bob']
     * @return Collection        A storage model collection
	 */
	public function getBy(array $conditions);

    /**
     * Checks if the model record exists
     *
     * @param  int    $id The record ID
     * @return boolean    Whether the model exists or not
     */
    public function exists(int $id) : bool;

	/**
	 * Created a storage model
	 */
	public function create(array $data);

	/**
	 * Updates a storage model
	 */
	public function update($id, array $data);

	/**
	 * Deleted a storage model
	 */
	public function delete($id);
}