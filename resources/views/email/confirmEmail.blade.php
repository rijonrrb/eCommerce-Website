
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

h3 span {
  position: relative;
  display: inline-block;
}

/* add a border below each span */
h3 span::after {
  content: " ";
  position: absolute;
  bottom: 5px;
  left: -5px;
  right: -5px;
  background-color: #e59c16;
  width: calc(100% + 10px); /* full width + -2x the left/right value */
  height: 6px;
  z-index: -1;
  border-radius: 10px;
}
</style>
</head>
<body>
<img src="{{asset('image/email.jpg')}}" alt="" width="600" height="400">
<h2>Hi {{ $details['name'] }}</h2>
<h5>Please Verify Your Email Account</h5>
<p>Thanks for signing up to our shop. Please use this code for verify your email account to pick up some products from us.</p>
<br>
<div style="margin-top:25px;text-align:center">
<div style="border:1px solid teal;text-align:center;font-size:1.2em;color:teal;border-radius:3px;display:inline-block;padding:3px 30px">{{ $details['code'] }}</div>
</div>
<br>
<h3><span>Thank you</span></h3>
<p>Ecommerce.Com</p>
<br><br>
</body>

