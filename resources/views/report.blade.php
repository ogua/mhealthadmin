<x-layouts.app>
    <h2 class="text-center">
        MHEALTH<br>
        {{ strtoupper($reporttype) }} REPORT
    </h2>

    <hr>

    @if ($reporttype == 'Symptoms')
        <div class="overflow-x-auto">
            <table class="table w-full border border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Time</th>
                        <th class="px-4 py-2">Mode</th>
                        <th class="px-4 py-2">Symptoms</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $item->mdate }}</td>
                            <td class="px-4 py-2">{{ $item->mtime }}</td>
                            <td class="px-4 py-2">{{ $item->mode }}</td>
                            <td class="px-4 py-2">{{ $item->symptoms }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if ($reporttype == 'Measurement')
        <div class="overflow-x-auto">
            <table class="table w-full border border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Value</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Time</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $item->mtype }}</td>
                            <td class="px-4 py-2">{{ $item->mvalue }}</td>
                            <td class="px-4 py-2">{{ $item->mdate }}</td>
                            <td class="px-4 py-2">{{ $item->mtime }}</td>
                            <td class="px-4 py-2">{{ $item->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if ($reporttype == 'Medication')
        <div class="overflow-x-auto">
            <table class="table w-full border border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Dose</th>
                        <th class="px-4 py-2">Unit</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $item->name }}</td>
                            <td class="px-4 py-2">{{ $item->dose }}</td>
                            <td class="px-4 py-2">{{ $item->unit }}</td>
                            <td class="px-4 py-2">{{ $item->mdate }}</td>
                            <td class="px-4 py-2">{{ $item->mtime }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if ($reporttype == 'Activities')
        <div class="overflow-x-auto">
            <table class="table w-full border border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Activity Type</th>
                        <th class="px-4 py-2">Value</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $item->atype }}</td>
                            <td class="px-4 py-2">{{ $item->mvalue }}</td>
                            <td class="px-4 py-2">{{ $item->mdate }}</td>
                            <td class="px-4 py-2">{{ $item->mtime }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if ($reporttype == 'Appointment')
        <div class="overflow-x-auto">
            <table class="table w-full border border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Support ID</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Time</th>
                        <th class="px-4 py-2">Note</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $item->support_id }}</td>
                            <td class="px-4 py-2">{{ $item->app_date }}</td>
                            <td class="px-4 py-2">{{ $item->app_time }}</td>
                            <td class="px-4 py-2">{{ $item->note }}</td>
                            <td class="px-4 py-2">{{ $item->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if ($reporttype == 'Support')
        <div class="overflow-x-auto">
            <table class="table w-full border border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Speciality</th>
                        <th class="px-4 py-2">City</th>
                        <th class="px-4 py-2">Phone</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Website</th>
                        <th class="px-4 py-2">Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $item->name }}</td>
                            <td class="px-4 py-2">{{ $item->speciality }}</td>
                            <td class="px-4 py-2">{{ $item->city }}</td>
                            <td class="px-4 py-2">{{ $item->phone }}</td>
                            <td class="px-4 py-2">{{ $item->email }}</td>
                            <td class="px-4 py-2">{{ $item->website }}</td>
                            <td class="px-4 py-2">{{ $item->utype }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if ($reporttype == 'Lab')
        <p class="text-center text-red-500">Lab report template not yet implemented.</p>
    @endif
</x-layouts.app>