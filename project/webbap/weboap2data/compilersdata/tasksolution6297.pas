Program pr18;
type Mas=array[1..200] of longint;
Var  M:Mas; n,k, i:longint;
begin
read(n);
   while n>=0 do
   begin
        for i:=1 to n do
         begin
             M[i]:=sqr(n);
             write(M[i],' ');
             break;
         end;
       n:=n-1;
       i:=i+1;
    end;
end.