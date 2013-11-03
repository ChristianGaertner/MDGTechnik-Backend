<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{ $name }} <small>von {{ $author }}</small></h2>
		
		<p>
			Sie haben diese Veranstaltung am {{ date('d.m.Y') }} erstellt. <br>
			Ihr persönlicher Schlüssel für diese Veranstaltung ist: <code>{{ $key }}</code>
		</p>

		<p>
			Vielen Dank für das Nutzen unseres Online-Angebotes.

			Mit freundlichen Grüßen,

			MDGTechnik
		</p>
	</body>
</html>