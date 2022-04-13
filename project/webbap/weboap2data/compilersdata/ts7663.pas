program zzz;
var x,y,a,b:real;

begin
read(x,y);

If (x<0) and (y<0) then
           begin
	   a:=abs(x);
	   b:=abs(y);
           end;
if (x<0) and (y>0) or (x>0) and (y<0) then
	begin
	    a:=x+0.5;
	    b:=y+0.5;
	end;
if (0.5<=x) and (x<=2) or (0.5<=y) and (y<=2) then
	begin
	    a:=x/10;
	    b:=y/10;
	end;
write(a:1:2,' ',b:1:2);
end.
