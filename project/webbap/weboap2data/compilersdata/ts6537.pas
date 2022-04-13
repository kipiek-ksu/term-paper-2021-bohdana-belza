Program a334;
type
  ta=array[1..1000,1..1000] of integer;
var
  a:ta;
  i,j:integer;
  n,m:integer;
 
procedure Shell(var item: DataArray; count:integer);
       const
         t = 5;
       var
         i, j, k, s, m: integer;
         h: array[1..t] of integer;
         x: DataItem;
       begin
         h[1]:=9; h[2]:=5; h[3]:=3; h[4]:=2; h[5]:=1;
         for m := 1 to t do
           begin

         k:=h[m];
         s:=-k;
         for i := k+1 to count do
         begin
           x := item[i];
           j := i-k;
           if s=0 then
           begin
             s := -k;
             s := s+1;
             item[s] := x;
           end;
           while (x<item[j]) and (j<count) do
             begin
               item[j+k] := item[j];
               j := j-k;
             end;
             item[j+k] := x;
           end;
         end;
     end;

readln;
end.