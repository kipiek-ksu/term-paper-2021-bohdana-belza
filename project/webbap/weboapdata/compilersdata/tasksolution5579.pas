program l6z13;
var i,j,n,m:longint;a:array[1..8] of real;
max:real;
function st(a:real;b:longint):real;
var i:longint;k:real;
begin
     k:=1;
     if b<>0 then
     for i:=1 to b do
     k:=k*a;
     st:=k;
end;
begin
    for i:=1 to 8 do
        begin
        read(a[i]);
        end;
     for i:=1 to 8 do
    begin
         for j:=1 to 8 do begin
         if j=8 then write(st(a[j],i-1):0:0) else
         write(st(a[j],i-1):0:0,' ');
         end;
         writeln;
        end;

end.