Program AAAA;
var i,j : byte;
	a:array[1..9,1..9] of real;

function pow(x,y:real):real;
begin
	pow:=exp(y*ln(x));
end;
BEGIN
	for i:=1 to 8 do
		read(a[1,i]);
		
	for i:=2 to 8 do
		for j:=1 to 8 do
			a[i,j]:=pow(a[1,j],i);
	
	for i:=1 to 8 do
		begin
			for j:=1 to 7 do
				write(a[i,j]:0:0,' ');
			if i<>8 then writeln(a[i,8]:0:0) else write(a[i,8]:0:0);
		end;
END.
