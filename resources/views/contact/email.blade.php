<p>
  Otrzymałeś wiadomość z formularza kontatowego ze strony Local Moto Spot
</p>
<p>
  Szczegóły wiadomości:
</p>
<ul>
  <li>Imię: <strong>{{ $name }}</strong></li>
  <li>Email: <strong>{{ $email }}</strong></li>
  <li>Telefon: <strong>{{ $phone }}</strong></li>
</ul>
<hr>
<p>
  @foreach ($messageLines as $messageLine)
    {{ $messageLine }}<br>
  @endforeach
</p>
<hr>