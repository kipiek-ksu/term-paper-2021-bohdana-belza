program l6z13;
var i,j,n,m:longint;a:array[1..50,1..50] of real;
b:array[1..50,1..50] of real;d,max:real;
begin
    readln(m,n);
    max:=0;
    for i:=1 to m do
    begin
         for j:=1 to n do begin
         read(a[i,j]);if abs(a[i,j])>max then max:=abs(a[i,j]);
         end;
        end;
     for i:=1 to m do
    begin
         for j:=1 to n do begin
         d:=a[i,j]/max;
         if j=n then write(d:0:1) else
         write(d:0:1,' ');
         end;
         writeln;
        end;

end.