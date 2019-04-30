<thead>
    <tr><!--rowspan:縦結合、colspan：横結合-->
        <th rowspan = "3">残業申請</th>
        <th rowspan = "3">日付</th>
        <th rowspan = "3">曜日</th>
        <th colspan = "8">実績</th>
        <th colspan = "5">所定外勤務</th>
    </tr>
    <tr>
        <th colspan = "3">出社</th>
        <th colspan = "3">退社</th>
        <th rowspan = "2">在社時間</th>
        <th rowspan = "2">備考</th>
        <th colspan = "2">終了予定時間</th>
        <th rowspan = "2">時間外時間</th>
        <th rowspan = "2">業務処理内容</th>
        <th rowspan = "2">指示者確認㊞</th>
    </tr>
    <tr>
        <th>時</th>
        <th>分</th>
        <th></th>
        <th>時</th>
        <th>分</th>
        <th></th>
        <th>時</th>
        <th>分</th>
    </tr>
</thead>

<tbody>
    @for ($i = 1; $i <= $endDate->day; $i++)
        @php
            $targetDay = ($i === 1) ? $startDate : $startDate->addDays();
        @endphp
        <tr>
            <td></td>
            <td>{{ getFormatDate($targetDay) }}</td>
            <td class={{ getWeekType($targetDay->dayOfWeek) }}>{{ $weeks[$targetDay->dayOfWeek] }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endfor
</tbody>

<tfoot>
    <tr>
        <td></td>
        <td colspan = "2"></td>
        <td colspan = "6"></td>
        <td></td>
        <td colspan = "5"></td>
        <td></td>
    </tr>
</tfoot>
