rogram z_15;
var i : word;
	a,b:real;
BEGIN
	read(a,b);
	i:=0;
	while(a<=b) do
	begin
	a:=a*(1+0.01/100);
	inc(i);
end;
	write(i);
END.
