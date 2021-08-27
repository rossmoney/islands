<html>
    <head>
        <title>{{ env('APP_NAME') }}</title>

        <style type="text/css">
        .water {
            color: blue;
        }

        .island {
            color: green;
        }
        </style>
    </head>
    <body>
        <h1>Solution</h1>
        {!! $json !!}

        <hr>

        {!! $prettyMap !!}

        <hr>

        <h1>Notes</h1>
        <ul>
            <li>Code can be found in IslandController and in a trait called Island.</li>
            <li>I spent about 3 hours on this (had to go into work on thursday).</li>
            <li>Given more time I would have formatted the json using a laravel plugin, or maybe on the frontend using a javascript framework. 
                I would have shown the islands in a different colour to the sea.</li>
            <li>I have put the calculation code in a Trait to keep it seperate and so it can be reused elsewhere in the application.</li>
            <li>Possibly would have written it so that multiple maps could be stored along with their island counts.</li>
        </ul>
    </body>
</html>