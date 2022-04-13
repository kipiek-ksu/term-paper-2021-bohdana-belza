program lb1_29; uses crt;
var x, y: array [1..3] of real;
s:real; i:integer;
begin
for i:=1 to 3 do begin
write ('x[',i,']='); read (x[i]);
write ('y[',i,']='); read (y[i]);
end;
s:=0.5*abs((x[1]-x[3])*(y[1]-y[3])-(x[2]-x[3])*(y[1]-y[3]));
write(s:4:2);
end.