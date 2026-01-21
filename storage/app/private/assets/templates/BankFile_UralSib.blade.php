{!! mb_str_pad($recipients['meta']['count'], 5, ' ', STR_PAD_LEFT) !!}5555746{!! mb_str_pad($recipients['meta']['summ'], 15, ' ', STR_PAD_LEFT) !!}z
@foreach ($recipients['data'] as $recipient)
{!! mb_str_pad($recipient['last_name'], 20, ' ') !!}{!! mb_str_pad($recipient['first_name'], 20, ' ') !!}{!! mb_str_pad($recipient['middle_name'], 20, ' ') !!}{!! $recipient['account'] !!}{!! mb_str_pad($recipient['summ'], 14, ' ', STR_PAD_LEFT) !!}        0.002
@endforeach
