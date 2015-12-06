PHP Web Benchmarks
==================

## Serialize

1. Serialize a simple array with php-5.6

Function            | Time     |
------------------- | -------- |
bin_encode          | 1088 ms  |
msgpack_pack        | 1232 ms  |
bson_encode         | 1288 ms  |
json_encode         | 1826 ms  |
serialize           | 2579 ms  |
igbinary_serialize  | 2704 ms  |
var_export          | 3445 ms  |

2. Serialize a simple object with php-5.6

Function            | Time     |
------------------- | -------- |
bin_encode          | 598 ms   |
msgpack_pack        | 647 ms   |
bson_encode         | 775 ms   |
json_encode         | 1224 ms  |
serialize           | 1675 ms  |
igbinary_serialize  | 1973 ms  |
var_export          | 2578 ms  |

