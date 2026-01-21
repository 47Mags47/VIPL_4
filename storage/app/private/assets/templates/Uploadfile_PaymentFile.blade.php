@foreach ($recipients as $i => $recipient)
@php
    $npp            = $i + 1;
    $last_name      = (string) $recipient->last_name;
    $first_name     = (string) $recipient->first_name;
    $middle_name    = (string) $recipient->middle_name;
    $d_rojd         = (string) $recipient->d_rojd->format('d.m.Y');
    $snils          = (string) $recipient->snils;
    $account        = (string) $recipient->account;
    $summ           = (string) number_format($recipient->summ, 2, '.', '');
    $p_series       = (string) $recipient->p_series;
    $p_number       = (string) $recipient->p_number;
    $p_date         = (string) $recipient->p_date->format('d.m.Y');
    $p_div          = (string) $recipient->p_div;
@endphp
{{ "$npp;$last_name;$first_name;$middle_name;$d_rojd;$snils;$account;$summ;$p_series;$p_number;$p_date;$p_div" }}
@endforeach
