program L_10_147;
var s1, s2, s3, k : string;
    i : integer;
begin
readln(s1);
readln(s2);
readln(s3);
k := ';
for i := 1 to length(s1) do
if (pos(s1[i], s2) > 0) and (pos(s1[i], s3) > 0) and (pos(s1[i], k) = 0)
then
begin
k := k + s1[i];
write(s1[i]);
end;
end.