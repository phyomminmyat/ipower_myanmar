<?php

namespace App\Repositories\Backend\Transformer;

use App\Models\Transformer\Transformer;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransformerRepository.
 */
class TransformerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Transformer::class;

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable($order_by = 'created_at', $sort = 'desc')
    {
        return $this->query()
            ->orderBy($order_by, $sort)
            ->select('*');
    }

    /**
     * @param array $input
     */
    public function create($input)
    {
        $data = $input['data'];

        $transformer = $this->createTransformerStub($data);
        DB::transaction(function () use ($transformer, $data) {
            if ($transformer->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.transformer.create_error'));
        });
    }

    /**
     * @param Model $transformer
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $transformer, array $input)
    {
        $data = $input['data'];

        $transformer->street_id    = $data['street_id'];
        $transformer->transformer_name  = $data['transformer_name'];
        $transformer->qrcode       = $data['qrcode'];
        $transformer->latitude     = $data['latitude'];
        $transformer->longitude    = $data['longitude'];
        $transformer->created_by   = access()->user()->id;
        $transformer->updated_by   = access()->user()->id;

        DB::transaction(function () use ($transformer, $data) {
            if ($transformer->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.transformer.update_error'));
        });
    }

    /**
     * @param Model $transformer
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $transformer)
    {
        if ($transformer->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.transformer.delete_error'));
    }

    /**
     * @param Model $user
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $user)
    {
        if (is_null($user->deleted_at)) {
            throw new GeneralException(trans('exceptions.backend.access.users.delete_first'));
        }

        DB::transaction(function () use ($user) {
            if ($user->forceDelete()) {
                event(new UserPermanentlyDeleted($user));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
        });
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createTransformerStub($input)
    {
        $transformer = self::MODEL;
        $transformer = new $transformer;
        $transformer->street_id     = $input['street_id'];
        $transformer->transformer_name   = $input['transformer_name'];
        $transformer->qrcode        = $input['qrcode'];
        $transformer->latitude      = $input['latitude'];
        $transformer->longitude     = $input['longitude'];
        $transformer->created_by    = access()->user()->id;
        $transformer->updated_by    = access()->user()->id;   

        return $transformer;
    }

    public function getTransformerList()
    {
        $transformer_list = Transformer::join('streets','streets.id','=','transformers.street_id')
                        ->where('transformers.deleted_at',null)
                        ->select('transformers.id','transformers.transformer_name','transformers.qrcode','transformers.latitude','transformers.longitude','streetsstreet_name')
                        ->get();

        return $transformer_list;
    } 
}