program ex_15;
type ych=record
        sur:string;
        ne:string;
        fne:string;
        str:string;
        ho:integer;
        fl:integer;
        end;
var a:array [1..25] of ych;
    i,n:integer;
    x:string;
begin
readln(x);
readln(n);
for i:=1 to n do
with a[i] do begin
readln(sur);
readln(ne);
readln(fne);
readln(str);
readln(ho);
readln(fl);
end;
for i:=1 to n do
with a[i] do begin
if fne=x then begin
writeln(sur);
writeln(ne);
writeln(fne);
writeln(str);
writeln(ho);
writeln(fl);
end;
end;