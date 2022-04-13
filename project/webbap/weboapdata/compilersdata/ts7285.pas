Program a1;
var x,h,m: real;   r : string;
begin
Read (x);
h:=x div 60;
m:=x-h*60;
If h>m then r:='h>m';
If h=m then r:='h=m';
If m>h then r:='m>h';
write (r);
end.
