var
   q:string;
   i:integer;
   cword:string;
   Function Find(var s:string; var i: integer):string;
   const
        letters = ['A'..'Z','a'..'z'];
   var
      j:integer;
      flag:boolean;
      result:string;
   begin
        j:=i;
        flag:=false;
        while (j<length(S)) and (flag=false) do
        begin
             j:=j+1;
             while (j<length(S)) and not (S[j] in letters) do
                   j:=j+1;
             i:=j;
             while (j<length(S)) and (S[j] in letters) do
             begin
                  if S[j]=S[j+1] then
                     flag:=true;
                  j:=j+1;
             end;
        end;
        if flag=true then
           result:=copy(S,i,j-i)
        else
            result:='';
        i:=j+1;
        Find:=result
   end;
begin
     readln(q);
     i:=0;
     cword:=Find(q,i);
     if cword <> '' then
     begin
          write(cword);
          cword:=Find(q,i);
          while cword <> '' do
          begin
               writeln;
               writeln(cword);
               cword:=Find(q,i)
          end
     end
     else
         write('NO')
end.
