<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
    /**
     * Inserts data into the database. If demo mode is active, it does nothing and returns 0 or true.
     */
    public function insert($data = null, bool $returnID = true)
    {
        if (config('App')->demoMode ?? true) {
            return $returnID ? 0 : true;
        }
        return parent::insert($data, $returnID);
    }

    /**
     * Updates a record. If demo mode is active, it does nothing and returns true.
     */
    public function update($id = null, $data = null): bool
    {
        if (config('App')->demoMode ?? true) {
            return true;
        }
        return parent::update($id, $data);
    }

    /**
     * Deletes a record. If demo mode is active, it does nothing and returns true.
     */
    public function delete($id = null, bool $purge = false)
    {
        if (config('App')->demoMode ?? true) {
            return true;
        }
        return parent::delete($id, $purge);
    }
}
