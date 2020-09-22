<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .regular-checkbox {
            -webkit-appearance: none;
            background-color: #fafafa;
            border: 1px solid #cacece;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
            padding: 9px;
            border-radius: 3px;
            display: inline-block;
            position: relative;
        }
        .regular-checkbox:active, .regular-checkbox:checked:active {
            box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
        }

        .regular-checkbox:checked {
            background-color: #e9ecee;
            border: 1px solid #adb8c0;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05), inset 15px 10px -12px rgba(255,255,255,0.1);
            color: #99a1a7;
        }
        .regular-checkbox:checked:after {
            content: '\2714';
            font-size: 14px;
            position: absolute;
            top: 0px;
            left: 3px;
            color: #99a1a7;
        }
        .big-checkbox {
            padding: 18px;
        }

        .big-checkbox:checked:after {
            font-size: 28px;
            left: 6px;
        }
    </style>
</head>
<body>
    <div>
		<label>Checkbox Small</label>
		<input type="checkbox" id="checkbox-1-1" class="regular-checkbox" />
		<nput type="checkbox" id="checkbox-1-2" class="regular-checkbox" />
		<input type="checkbox" id="checkbox-1-3" class="regular-checkbox" />
		<input type="checkbox" id="checkbox-1-4" class="regular-checkbox" />
	</div>
	<div>
		<label>Checkbox Big</label>
		<input type="checkbox" id="checkbox-2-1" class="regular-checkbox big-checkbox" />
		<input type="checkbox" id="checkbox-2-2" class="regular-checkbox big-checkbox" />
		<input type="checkbox" id="checkbox-2-3" class="regular-checkbox big-checkbox" />
		<input type="checkbox" id="checkbox-2-4" class="regular-checkbox big-checkbox" />
	</div>
</body>
</html>