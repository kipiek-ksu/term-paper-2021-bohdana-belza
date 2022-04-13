program L_10_8;
var s1, s2 : string;
    k, i : integer;
begin
readln(s1);
readln(s2);
k := 0;
while (pos(s2, s1) > 0) do
begin
k := k + 1;
s1 := copy(s1, pos(s2, s1) + 1, length(s1) - pos(s2, s1));
end;
write(k);
end.