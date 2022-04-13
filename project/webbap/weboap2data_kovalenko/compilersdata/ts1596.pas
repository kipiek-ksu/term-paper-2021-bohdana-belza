program z_2;
var	x,c:word;
	
a1,a2:longint;


BEGIN

read(x);
c:=1;
 a1:=0;
 a2:=0;

while (c<64) do

begin
	
c:=c*2;
	
a1:=a1+(x-c);

a2:=a2+(x-(c-1));

end;
