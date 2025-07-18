<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Consortium Report 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        @page {
            size: A4 portrait;
            margin: 20mm;
        }
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

        body {
            width: 210mm;
            height: 297mm;
            margin: auto;
            font-family: 'Segoe UI', sans-serif;
        }

        .container-pdf {
            width: 100%;
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        .gallery {
            width: 70%;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .gallery img {
            width: 48%;
            height: 290px;
            object-fit:wrap;
            border-radius: 6px;
        }

        .highlights {
            width: 30%;
        }

        .highlight-block {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            background: #f8f9fa;
            padding: 12px;
            border-radius: 10px;
        }

        .highlight-block i {
            font-size: 48px;
            margin-right: 15px;
        }

        .highlight-text {
            text-align: left;
        }

        .highlight-value {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 3px;
        }

        .highlight-text .text-muted {
            font-size: 17px;
            font-weight: 600;
        }

.date-time-box {
    background-color: #003893;
    color: white;
    padding: 20px;
    border-radius: 14px;
    text-align: center;
    width: 100%;
    margin: 0 auto;
    font-weight: bold;
    font-family: 'Segoe UI', sans-serif;
}

.top-icons {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}

.icon-block {
    flex: 1;
    display: flex;
    justify-content: center;
    font-size: 28px;
    padding: 10px 0;
}

.divider-vertical {
    width: 2px;
    height: 40px;
    background-color: white;
}

.divider-horizontal {
    height: 2px;
    background-color: white;
    margin: 8px 0 12px;
}

.date-text {
    font-size: 20px;
    margin-bottom: 6px;
}

.time-text {
    font-size: 20px;
}



        .dot-separator {
            text-align: center;
            font-size: 20px;
            color: #2d2e30ff;
            margin: 15px 0;
        }

        .section-header {
            font-size: 20px;
            font-weight: bold;
        }

        .title {
            font-size: 24px;
            font-weight: 700;
        }
    </style>
</head>
<body>

<div class="text-center mb-4">
    <img src="/img/tce.jpg" alt="College Logo" style="height: 100px;">
    <h3 class="title mt-2">Thiagarajar College of Engineering</h3>
    <p>Where quality and ethics matter</p>
    <h4 class="section-header mt-4">
    {{ strtoupper($event->club->club_name) }} ACTIVITY REPORT – {{ \Carbon\Carbon::parse($event->start_date)->format('Y') }}
</h4>
    <p class="text-danger fw-bold">INSPIRING INNOVATION | BUILDING AI TALENT | PROMOTING COLLABORATION</p>
<h2 class="text-success fw-bold">
    {{ strtoupper($event->event_name) }} - {{ \Carbon\Carbon::parse($event->start_date)->format('Y') }}
</h2>
    <p>In-lab internship for future engineers</p>
</div>

<div class="dot-separator">•••• •••• •••• •••• •••• •••• •••• •••• •••• •••• •••• ••••</div>

<div class="container-pdf">
    <!-- Image Grid -->
    <div class="gallery">
        @foreach ($eventImages as $img)
            <img src="{{ asset('storage/' . $img) }}" alt="Event Image">
        @endforeach
    </div>

    <!-- Highlights -->
    <div class="highlights">
        <h5 class="text-primary fw-bold mb-3">KEY HIGHLIGHTS</h5>

        <div class="highlight-block">
            <i class="bi bi-people-fill text-info"></i>
            <div class="highlight-text">
                <div class="highlight-value">{{ $event->participants }}</div>
                <div class="text-muted">Participants</div>
            </div>
        </div>

        <div class="highlight-block">
            <i class="bi bi-person-check-fill text-danger"></i>
            <div class="highlight-text">
                <div class="highlight-value">{{ $event->coordinators }}</div>
                <div class="text-muted">Coordinators</div>
            </div>
        </div>

        <div class="highlight-block">
            <i class="bi bi-award-fill text-warning"></i>
            <div class="highlight-text">
                <div class="highlight-value">{{ $event->best_performance }}</div>
                <div class="text-muted">Best Performances</div>
            </div>
        </div>

<div class="date-time-box">
    <div class="top-icons">
        <div class="icon-block">
            <i class="bi bi-calendar-week-fill"></i>
        </div>
        <div class="divider-vertical"></div>
        <div class="icon-block">
            <i class="bi bi-clock-fill"></i>
        </div>
    </div>
    <div class="divider-horizontal"></div>
    <div class="date-text">
        {{ \Carbon\Carbon::parse($event->start_date)->format('d') }}–
        {{ \Carbon\Carbon::parse($event->end_date)->format('d M, Y') }}
    </div>
    <div class="time-text">{{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}–
                {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}
    </div>
</div>

            
    </div>
</div>

<div class="dot-separator mt-4">•••• •••• •••• •••• •••• •••• •••• •••• •••• •••• •••• ••••</div>

<script>
    window.onload = function () {
        window.print();
    };
</script>

</body>
</html>
