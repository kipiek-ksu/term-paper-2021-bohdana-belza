program l_4_87;
var n:integer;r:string;
begin
read(n);
case n of
1,21,31,41,51,61,71,81,91:r:='grivna';
5..20,25..30,35..40,45..50,55..60,65..70,75..80,85..90,95..100:r:='griven';
2..4,22..24,32..34,42..44,52..54,62..64,72..74,82..84,92..94:r:='grivni';end;
write(r);
end.