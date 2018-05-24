<?php

namespace App\Repositories\Backend\ReportType;

use App\Models\ReportType\ReportType;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportTypeRepository.
 */
class ReportTypeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = ReportType::class;

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

        $report_type = $this->createReportTypeStub($data);

        DB::transaction(function () use ($report_type, $data) {
            if ($report_type->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.township.create_error'));
        });
    }

    /**
     * @param Model $report_type
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $report_type, array $input)
    {
        $data = $input['data'];

        $report_type->type_name  = $data['type_name'];
        $report_type->description = $data['description'];
        $report_type->created_by = access()->user()->id;
        $report_type->updated_by = access()->user()->id;

        DB::transaction(function () use ($report_type, $data) {
            if ($report_type->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.township.update_error'));
        });
    }

    /**
     * @param Model $report_type
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $report_type)
    {
        if ($report_type->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.township.delete_error'));
    }

    /**
     * @param Model $report_type
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $report_type)
    {
        if (is_null($report_type->deleted_at)) {
            throw new GeneralException(trans('exceptions.backend.access.users.delete_first'));
        }

        DB::transaction(function () use ($report_type) {
            if ($report_type->forceDelete()) {

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
    protected function createReportTypeStub($input)
    {
        $report_type = self::MODEL;
        $report_type = new $report_type;
        $report_type->type_name   = $input['type_name'];
        $report_type->description = $input['description'];
        $report_type->created_by  = access()->user()->id;
        $report_type->updated_by  = access()->user()->id;   

        return $report_type;
    }
}