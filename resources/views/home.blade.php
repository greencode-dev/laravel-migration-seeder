<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabellone Treni</title>
    <!-- Link al font bonus suggerito -->
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #fbc531;
            font-family: 'Share Tech Mono', monospace;
            padding: 40px;
            margin: 0;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .board {
            background-color: #1e272e;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 0 20px rgba(0,0,0,0.8);
            border: 2px solid #3d3d3d;
        }
        h1 {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 4px;
            border-bottom: 2px solid #3d3d3d;
            padding-bottom: 20px;
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            text-align: left;
            color: #7f8c8d;
            font-size: 0.8rem;
            padding: 10px;
            border-bottom: 1px solid #3d3d3d;
        }
        td {
            padding: 15px 10px;
            border-bottom: 1px solid #2d3436;
            font-size: 1.1rem;
        }
        .status-cancelled { color: #eb4d4b; }
        .status-delayed { color: #f0932b; }
        .status-on-time { color: #6ab04c; }
    </style>
</head>
<body>
    <div class="container">
        <div class="board">
            <h1>Partenze Stazione Centrale</h1>
            <table>
                <thead>
                    <tr>
                        <th>Codice</th>
                        <th>Azienda</th>
                        <th>Partenza</th>
                        <th>Destinazione</th>
                        <th>Orario</th>
                        <th>Stato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trains as $train)
                    <tr>
                        <td>{{ $train->codice_treno }}</td>
                        <td>{{ $train->azienda }}</td>
                        <td>{{ $train->stazione_di_partenza }}</td>
                        <td>{{ $train->stazione_di_arrivo }}</td>
                        <td>{{ $train->orario_di_partenza->format('H:i') }}</td>
                        <td>
                            @if($train->cancellato)
                                <span class="status-cancelled">CANCELLATO</span>
                            @elseif(!$train->in_orario)
                                <span class="status-delayed">RITARDO</span>
                            @else
                                <span class="status-on-time">IN ORARIO</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>