<?php
    /** @var Exception $exception */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internal Error Occurred</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/github-dark.min.css">
    <style>
        body {
            background: #eee;
        }

        /* for block of numbers */
        .hljs-ln-numbers {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            text-align: right;
            color: #777;
            vertical-align: top;
            padding-right: 20px !important;
            margin-right: 20px !important;
        }

        /* for block of code */
        .hljs-ln-code {

        }

        .trace {
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .hljs, .trace {
            background: #262626;
        }

        .trace-0 .hljs-ln-line[data-line-number="<?= $exception->getLine() ?>"] {
            background: #484848;
        }

        .trace-title {
            color: #000;
            background: #fff;
            padding: 5px 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .trace pre {
            padding: 0 20px;
        }
    </style>
</head>
<body>
    <div class="container bg-white border-1 rounded p-3">
        <div class="row">
            <div class="col">
                <div class="pb-2">
                    <img src="https://cdn.onesoftdir.ml/images/projects/invention/invention-logo-large.png" alt="Logo" width="100%">
                </div>
                <h4 class="text-muted pb-0 mb-0 d-flex align-items-center" style="font-weight: normal"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" style="fill:var(--bs-warning);" viewBox="0 0 16 16">
                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                    </svg>&nbsp;&nbsp;Something went wrong!</h4>
                <h1><?= $exception->getMessage(); ?></h1>
                <p class="font-monospace"><?= $exception->getFile(); ?>:<span class="text-primary"><?= $exception->getLine(); ?></span></p>
                <p>Code: <span class="font-monospace"><?= $exception->getCode(); ?></span></p>
                <p>Exception: <span class="font-monospace"><?= get_class($exception); ?></span></p>

                <h4>Stack Trace</h4>
                <pre><?= $exception->getTraceAsString(); ?></pre>

                <br>
                <br>

                <?php
                    $traceNum = 0;

                    function renderTrace($file, &$traceNum) {
                        ?>

                         <div class="trace trace-<?= $traceNum ?>">
                             <div class="trace-title d-flex justify-content-between">
                                <div class="d-flex align-items-baseline">
                                    <h5 class="p-0 m-0 mb-2"><?= basename($file) ?></h5>
                                    <p class="p-0 m-0 small text-muted">&nbsp;&nbsp;&nbsp;&nbsp;<?= dirname($file) ?></p>
                                </div>
                                <p class="p-0 m-0">#<?= $traceNum ?></p>
                            </div>
                            <pre class="file"><code class="language-php"><?= htmlspecialchars(file_get_contents($file)); ?></code></pre>
                        </div>

          <?php
                        $traceNum++;
                    }
                ?>

                <div id="tracing">
                    <?php renderTrace($exception->getFile(), $traceNum) ?>
                    <br>
                    <?php
                        foreach ($exception->getTrace() as $trace) {
                            if (isset($trace['line'])) {
                                echo "
                                    <style>
                                        .trace-{$traceNum} .hljs-ln-line[data-line-number=\"{$trace['line']}\"] {
                                            background: #484848;
                                        }
                                    </style>
                                ";

                                renderTrace($trace['file'], $traceNum);
                                echo "<br>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlightjs-line-numbers.js/2.8.0/highlightjs-line-numbers.min.js"></script>
    <script>
        hljs.highlightAll();
        hljs.initLineNumbersOnLoad();
    </script>
</body>
</html>
