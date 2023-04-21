
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

body {
  font-family: Arial, sans-serif;
}
h5 , h2 , h4 , p {
	text-align: center;
}
img {
  width: 100%;
  max-width: 500px;
  height: auto;
  display: block;
  margin-left: auto;
  margin-right: auto;
}
/* make headers display inline */
h3 {
  font-family: "Roboto Condensed", Sans-Serif;
  font-size: 35px;
  max-width: 100%;
  text-align: center;
}
</style>
</head>
<body>
<img src="https://img.freepik.com/free-vector/enter-otp-concept-illustration_114360-7887.jpg?w=740&t=st=1681986081~exp=1681986681~hmac=e81314ada432d018bb2057c56e11f57c1039998425c2251ced28f49cbc88662e" alt="" width="600" height="400">
<h2>Hi {{ $details['name'] }}</h2>
<h5>Please Verify Your Email Account</h5>
<p>Thanks for signing up to our shop. Please use this code for verify your email account to pick up some products from us.</p>
<br>
<div style="margin-top:25px;text-align:center">
<div style="border:1px solid teal;text-align:center;font-size:1.2em;color:teal;border-radius:3px;display:inline-block;padding:3px 30px">{{ $details['code'] }}</div>
</div>
<br>
<h3 style="text-decoration: solid underline #e59c16 5px;">Thank you</h3>
<p>Ecommerce.Com</p>
<br><br>
</body>

