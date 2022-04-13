Program L_6_18;
const n = 8;
var i,j:integer;
    x:array[1..n] of integer;
    A:array[1..n,1..n] of longint;
begin
for i:=1 to n do read(x[i]);
for j:=1 to n do A[1,j]:=1;
for i:=2 to n do
    for j:=1 to n do A[i,j]:=A[i-1,j]*x[j];
for i:=1 to n do
    for j:=1 to n do begin write(A[i,j]);
        if j < n then write(' ')
	else begin
        if i < n then writeln;
	end;
    end;
end.