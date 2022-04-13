Program L3z37;
const
	z = 100;
type
	MyArray = array[1..z] of integer;
var
	A:MyArray;
	B:MyArray;
	n:integer;
	m:integer;
	k:integer;
Procedure Inp(var A:MyArray; g:integer);
var
	i:integer;
begin
     for i:=1 to g do
	read(A[i])
end;

Procedure Out(var A:MyArray; g:integer);
var
	i:integer;
begin
	write(A[1]);
	for i:=2 to g do
		write(' ',A[i])
end;

Procedure Main(var A:MyArray; g:integer; k:integer);
var
   i:integer;
begin
	if g > 1 then
	begin
		if A[2] < A[1] then
		begin
			i:=3;
			while (i <= g) and (A[i] < A[i-1]) do
				i:=i+1;
			A[i]:=k;
		end
	end
end;

begin
	read(n);
	read(m);
	read(k);
	Inp(A,n);
	Inp(B,m);

	Main(A,n,k);
	Main(B,m,k);

	Out(A,n);
	writeln;
	Out(B,m)

end.