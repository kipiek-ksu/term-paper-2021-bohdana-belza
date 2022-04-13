program z15;
var x,y,r1,r2:real;
begin
  read (x,y);
  while x<>y do
  if x<y then r1:=(x+y)/2
         else r1:=2*x*y;
  if x>y then r2:=(x+y)/2
	 else r2:=2*x*y;	
  write (r1:3:3,' ',r2:3:3);
end.