<style>
  table.table {
      width  : 100%;
  }
  table.table-bordered {
      border : 2px solid black;
  }
  tr.bg-blue {
      background-color : blue;
      color            : yellow;
  }
  td.grid {
      border : 1px solid black;
  }
  a.btn-info {
      background-color : green;
  }
  a.btn {
      border           : none;
      color            : white;
      padding          : 15px 32px;
      text-align       : center;
      text-decoration  : none;
      display          : inline-block;
      font-size        : 16px;
  }
</style>
<table class="table table-bordered">
    <tr class="form-group bg-blue">
      <th>{{ __('orders.id') }}</th>
      <th>{{ __('orders.name') }}</th>
      <th>{{ __('orders.phone') }}</th>
      <th>{{ __('orders.model') }}</th>
      <th>{{ __('orders.address') }}</th>
      <th>{{ __('orders.flow_status') }}</th>
      <th width="280px">{{ __('tables.action') }}</th>
    </tr>
    @foreach ($orders as $order)
    <tr>
      <td class="grid">{{ $order->id }}</td>
      <td class="grid">{{ $order->member->user->name }}</td>
      <td class="grid">{{ $order->phone }}</td>
      <td class="grid">{{ trans_choice('orders.models', $order->model) }}</td>
      <td class="grid">{{ $order->address }}</td>
      <td class="grid">{{ trans_choice('orders.flow_statuses', $order->flow_status) }}</td>
      <td>
        <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">{{ __('tables.details') }}</a>
      </td>
    </td>
    @endforeach
</table>
