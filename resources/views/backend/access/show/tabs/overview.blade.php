<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.avatar') }}</th>
        <td><img src="{{ $user->picture }}" class="user-profile-image" /></td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.name') }}</th>
        <td>{{ $user->name }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.email') }}</th>
        <td>{{ $user->email }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.department') }}</th>
        <td>{!! ($user->department) ? $user->department->department_name : '' !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.dob') }}</th>
        <td>{!! $user->dob !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.contact_no') }}</th>
        <td>{!! $user->contact_no !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.fax_no') }}</th>
        <td>{!! $user->fax_no !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.nric_code') }}</th>
        <td>{!! ($user->nric_codes) ? $user->nric_codes->nric_code : '' !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.gender') }}</th>
        <td>{!! $user->gender !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.martial_status') }}</th>
        <td>{!! $user->martial_status !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.nationality') }}</th>
        <td>{!! $user->nationality !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.address') }}</th>
        <td>{!! $user->address !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.position') }}</th>
        <td>{!! $user->position !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.is_meter_owner') }}</th>
        <td>{!! $user->meter_label !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.is_civil_servant') }}</th>
        <td>{!! $user->civil_servant_label !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.status') }}</th>
        <td>{!! $user->status_label !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.confirmed') }}</th>
        <td>{!! $user->confirmed_label !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.created_at') }}</th>
        <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.last_updated') }}</th>
        <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
    </tr>

    @if ($user->trashed())
        <tr>
            <th>{{ trans('labels.backend.access.users.tabs.content.overview.deleted_at') }}</th>
            <td>{{ $user->deleted_at }} ({{ $user->deleted_at->diffForHumans() }})</td>
        </tr>
    @endif
</table>