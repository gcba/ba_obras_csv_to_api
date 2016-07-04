Arguments
---------

* `source`: source CSV url
* `source_format`: if the url does not end in `.csv`, you should specify 'csv' here (to facilitate future functionality)
* `format`: the requested return format, either `json`, `xml`, or `html` (default `json`)
* `callback`: if JSON, an optional JSONP callback
* `sort`: field to sort by (optional)
* `sort_dir`: direction to sort, either `asc` or `desc` (default `asc`)
* any field(s): may pass any fields as a key/value pair to filter by
* `header_row`: whether the source CSV has a header row; if missing, it will automatically assign field names (`field_1`, `field_2`, etc.); either `n` or `y` (default `y`)