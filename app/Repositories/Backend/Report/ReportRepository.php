<?php

namespace App\Repositories\Backend\Report;

use App\Models\Report\Report;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportRepository.
 */
class ReportRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Report::class;

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

        $report = $this->createReporttub($data);
        DB::transaction(function () use ($report, $data) {
            if ($report->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.street.create_error'));
        });
    }

    /**
     * @param Model $report
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $report, array $input)
    {
        $data = $input['data'];

        $report->report_type_id = $data['report_type_id'];
        $report->report_name = $data['report_name'];
        $report->description = $data['description'];
        $report->latitude   = $data['latitude'];
        $report->longitude  = $data['longitude'];
        $report->datetime  =  date('Y-m-d H:i:s',strtotime($data['datetime']));
        $report->created_by = access()->user()->id;
        $report->updated_by = access()->user()->id;

        DB::transaction(function () use ($report, $data) {
            if ($report->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.street.update_error'));
        });
    }

    /**
     * @param Model $report
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $report)
    {
        if ($report->delete()) {

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.street.delete_error'));
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
    protected function createReporttub($input)
    {
        $report = self::MODEL;
        $report = new $report;
        $report->report_type_id = $input['report_type_id'];
        $report->report_name = $input['report_name'];
        $report->description = $input['description'];
        $report->latitude    = $input['latitude'];
        $report->longitude   = $input['longitude'];
        $report->datetime    =  date('Y-m-d H:i:s',strtotime($input['datetime']));
        $report->created_by  = access()->user()->id;
        $report->updated_by  = access()->user()->id;   

        return $report;
    }

    public function saveReportApi($input,$member)
    {
        $report = self::MODEL;
        $report = new $report;
        $report->report_type_id = $input['report_type_id'];
        $report->report_name = $input['report_name'];
        $report->description = $input['description'];
        $report->latitude    = $input['latitude'];
        $report->longitude   = $input['longitude'];
        $report->datetime    = date('Y-m-d H:i:s');
        $report->created_by  = $member->id;
        $report->updated_by  = $member->id;   

        return $report;
    }

    public function getReportList()
    {
        $report_list = Report::join('report_types','report_types.id','=','report.report_type_id')->where('report.deleted_at',null)
                        ->select('report.id','report.report_name','report.street_code','report.description','report.latitude','report.longitude','report_types.type_name')
                        ->get();

        return $report_list;
    } 
}
