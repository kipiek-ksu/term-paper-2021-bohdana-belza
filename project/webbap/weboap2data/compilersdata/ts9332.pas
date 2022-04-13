Program v;
const
     D=[0..9];
     L=[A..Z,a..z];
var
   s:string;
   countDig:integer;
   countLet:integer;
   i:integer;
begin
     read(S);
     countDig:=0;
     countLet:=0;
     for i:=1 to length(s) do
         if s[i] in D then
            countDig:=countDig+1
         else
             if s[i] in L then
                countLet:=countLet+1;
     write(countDig);
     write(countLet)
end.